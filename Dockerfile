FROM node:latest
WORKDIR /app
COPY . .
RUN ls
RUN npm install