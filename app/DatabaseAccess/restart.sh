#!/bin/bash

sudo systemctl restart apache2
sudo systemctl restart mysql

sudo systemctl status apache2

#sudo systemctl status mysql

