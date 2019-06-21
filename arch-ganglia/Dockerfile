FROM binhex/arch-base:latest
MAINTAINER mohsenhadianpour@gmail.com

# additional files
##################

# add install bash script
ADD build/root/*.sh /root/

# install app
#############

# make executable and run bash scripts to install app
RUN chmod +x /root/*.sh

RUN curl --connect-timeout 5 --max-time 600 --retry 5 --retry-delay 0 --retry-max-time 60 -o /tmp/scripts-master.zip -L https://github.com/binhex/scripts/archive/master.zip && \
unzip /tmp/scripts-master.zip -d /tmp && \
mv /tmp/scripts-master/shell/arch/docker/*.sh /root/ 

ARG pacman_packages="git rsync nginx php-fpm"
ARG aur_packages="ganglia-web"
RUN pacman -S --needed $pacman_packages --noconfirm
RUN /bin/bash /root/aur.sh
RUN echo "open_basedir = /tmp:/usr/share/webapps:/var/lib/ganglia" >> /etc/php/php.ini


# cleanup
RUN yes|pacman -Scc && \
    pacman --noconfirm -Rns $(pacman -Qtdq) 2> /dev/null || true && \
    rm -rf /usr/share/locale/* && \
    rm -rf /usr/share/man/* && \
    rm -rf /usr/share/gtk-doc/* && \
    rm -rf /tmp/*
	
# docker settings
#################

# map /config to host defined config path (gmetad and gmond configs)
# VOLUME /etc/ganglia

# map ganglia rrds directory
# VOLUME /var/lib/ganglia

# VOLUME /var/log/supervisor
# map nginx configs
# VOLUME /etc/nginx

# expose port for http
EXPOSE 80

# set permissions
#################

# add supervisord config
ADD build/supervisord.conf /etc/supervisor/conf.d/

# add nginx config
ADD build/nginx.conf /etc/nginx/

ADD build/root/init1.sh /root/

RUN chown -R root:root /var/lib/ganglia && \
chown -R root:root /etc/nginx && \
chown -R root:root /etc/ganglia && \
chown -R root:root /usr/share/webapps/ganglia && \
chown -R root:root  /var/log/supervisor && \
chmod 777 -R /var/lib/ganglia && \
chmod 777 -R /etc/nginx && \
chmod 777 -R /etc/ganglia && \
chmod 777 -R /usr/share/webapps/ganglia && \
chmod 777 -R /var/log/supervisor

# run script to set uid, gid and permissions
CMD ["/bin/bash", "/root/init1.sh"]
