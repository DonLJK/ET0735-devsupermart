FROM python:3.8-slim-buster

WORKDIR /devops-supermarket

COPY requirements.txt .

RUN pip install -r requirements.txt 

COPY ./app ./app 
COPY ./src ./src
COPY ./src/hal ./src/hal

CMD ["python", "./app/app.py"]
CMD ["python", "./src/main.py"]