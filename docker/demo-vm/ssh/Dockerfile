FROM debian:stretch
MAINTAINER SURFnet <info@surfnet.nl>

ARG DEBIAN_FRONTEND=noninteractive
ARG RUNLEVEL=1
ENV TERM linux
RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections
ARG ssh_pub_key

# add the backports repository so we get the right version of systemd
ADD sources.list /etc/apt/sources.list

RUN echo "exit 0" > /usr/sbin/policy-rc.d

# clean out, update and install systemd from backports
#RUN apt-get update -y && apt-get dist-upgrade -y
RUN apt-get update -y
RUN apt-get install -y apt-utils
RUN apt-get -t stretch-backports install -y systemd

# Install base tools: sshd, python
# RUN apt-get update
RUN apt-get install -y openssh-server python2.7 python3 python sudo locales
RUN update-locale
RUN systemctl enable ssh.service
RUN systemctl disable getty\@tty1.service

# sshd services in all containers
EXPOSE 22

# Create and configure vagrant user
RUN useradd --create-home -s /bin/bash vagrant

# Configure SSH access
RUN mkdir -p /home/vagrant/.ssh
RUN echo "${ssh_pub_key}" >> /home/vagrant/.ssh/authorized_keys
RUN chown -R vagrant: /home/vagrant/.ssh
RUN echo -n 'vagrant:vagrant' | chpasswd

# Enable passwordless sudo for the "vagrant" user
RUN mkdir -p /etc/sudoers.d
RUN install -b -m 0440 /dev/null /etc/sudoers.d/vagrant
RUN echo 'vagrant ALL=(ALL) NOPASSWD: ALL' >> /etc/sudoers.d/vagrant

# Clean up APT when done.
RUN apt-get clean -y && apt-get autoremove -y && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#VOLUME [ "/sys/fs/cgroup", "/run", "/run/lock", "/tmp" ]
CMD ["/lib/systemd/systemd"]
