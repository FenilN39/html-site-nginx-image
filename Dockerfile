FROM nginx:alpine
## Copy a new configuration file setting listen port to 8080
COPY . /usr/share/nginx/html/
COPY ./default.conf /etc/nginx/conf.d/
RUN chmod +x /usr/share/nginx/html/*
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
