from flask import Flask, render_template, redirect
import logging
from google.cloud import firestore

import os

app = Flask(__name__)

base_logger = logging.getLogger("google")
base_logger.addHandler(logging.StreamHandler())
base_logger.setLevel(logging.DEBUG)

image_resizer = os.getenv("IMAGE_RESIZER")
pdf_portfolio = os.getenv("PDF_PORTFOLIO")

app.jinja_env.globals['image_resizer'] = image_resizer
app.jinja_env.globals['shop_open'] = os.getenv("SHOP_OPEN", "False")

db = firestore.Client()

collection_ref = db.collection('projects')
query = collection_ref.where('owner', '==', 'Olivia Zuo')
results = query.stream()

# Print the results
for doc in results:
    print(f'{doc.id} => {doc.to_dict()}')


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

@app.route("/portfolio.pdf", methods=['GET'])
def portfolio():
    return redirect(pdf_portfolio, code=303)
