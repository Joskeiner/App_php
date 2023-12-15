#!/bin/bash

# Set permissions after container starts
chmod +x /var/www/public/

# Start the Apache server
apache2-foreground
