FROM nginx
RUN rm /etc/nginx/conf.d/default.conf
ADD conf/core/nginx.conf /etc/nginx/nginx.conf
ADD conf/app/dev/home.conf /etc/nginx/conf.d/home.conf
# ADD conf/app/dev/home.conf /etc/nginx/conf.d/home.conf -> Only for production env.
