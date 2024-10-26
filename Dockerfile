FROM ubuntu:latest
LABEL authors="sfe34"

ENTRYPOINT ["top", "-b"]