from flask import Flask,render_template
from flask_socketio import SocketIO
from flask_serial import Serial
from eventlet import monkey_patch
#taskkill /f /im ngrok.exe
monkey_patch()

app = Flask(__name__)
app.config['SERIAL_TIMEOUT'] = 0.2
app.config['SERIAL_PORT'] = 'COM4'
app.config['SERIAL_BAUDRATE'] = 115200
app.config['SERIAL_BYTESIZE'] = 8
app.config['SERIAL_PARITY'] = 'N'
app.config['SERIAL_STOPBITS'] = 1
app.config['SECRET_KEY'] = 'secret!'

ser =Serial(app)
socketio = SocketIO(app)
@app.route('/')
def index():
    return render_template('index.html')
@socketio.on('encender')
def encender_led():
    ser.on_send(b'1')  # Envia '1' al Arduino para encender el LED
@socketio.on('apagar')
def apagar_led():
    ser.on_send(b'0')  # Envia '0' al Arduino para apagar el LED
@ser.on_message()
def handle_message(medida):
    medida = medida.decode().replace('\r', '').replace('\n', '').replace(' ','')
    datos = list(map(int, medida.split(',')))
    sensor_id = int(datos[0])
    if sensor_id == 2:
        socketio.emit('data', {'parte1': datos[0], 'parte2': datos[1]})
        print(datos[0],",",datos[1])
    elif sensor_id == 1:
        socketio.emit('data', {'parte1': datos[0], 'parte2': datos[1], 'parte3': datos[2]})
        print(datos[0], ",", datos[1],",", datos[2])

if __name__ == '__main__':
    socketio.run(app,debug =False)