FROM nginx:latest

COPY /host.conf /etc/nginx/conf.d/default.conf
COPY /nginx.conf /etc/nginx/nginx.conf

COPY ./wildcard.smartsavings.dev/bundle.pem /etc/nginx/certs/wildcard.smartsavings.dev/bundle.pem
COPY ./wildcard.smartsavings.dev/wildcard.smartsavings.dev.key /etc/nginx/certs/wildcard.smartsavings.dev/privatekey.key
