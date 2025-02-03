# syntax=docker/dockerfile:1

FROM python:3.13-slim-bookworm

COPY /src /src

WORKDIR /src

ENV PORT=${PORT:-8080}

COPY requirements.txt requirements.txt

RUN pip3 install -r requirements.txt

CMD ["sh", "-c", "python3 -m flask --app 'src/router' run --host=0.0.0.0 --port=${PORT}"]