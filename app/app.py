from flask import Flask, render_template
app = Flask(__name__)
@app.route("/")
def home():

        return render_template('index.php')

if __name__ == '__main__':
        app.run(host="0.0.0.0")
    #margin-top: -100px; 
    #margin-left: -900px; 
