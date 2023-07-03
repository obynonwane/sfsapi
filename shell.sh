#!/bin/bash

# Change to your Laravel project directory
# cd /path/to/your/laravel/project

while true; do
  # Run the passport:keys command
  php artisan passport:keys

  # Set permissions for the private key
  chmod 600 storage/oauth-private.key

  # Set permissions for the public key
  chmod 600 storage/oauth-public.key

  # Delay for 1 minute
  sleep 60
done
