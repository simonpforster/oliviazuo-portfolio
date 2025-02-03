from flask import Flask, render_template
import os

app = Flask(__name__)

app.jinja_env.globals['image_resizer'] = os.getenv("IMAGE_RESIZER")
app.jinja_env.globals['shop_open'] = os.getenv("SHOP_OPEN", "False")

@app.route("/", methods=['GET'])
def index():
    return render_template("views/index.html")

@app.route("/personal", methods=['GET'])
def personal():
    return render_template("views/personal.html")

@app.route("/commercial", methods=['GET'])
def commercial():
    return render_template("views/commercial.html")

@app.route("/shop", methods=['GET'])
def shop():
    return render_template("views/shop.html")
