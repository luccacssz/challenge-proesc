FROM php:5.6-apache

# Corrigir repositórios Stretch obsoletos
RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list \
 && sed -i 's/security.debian.org/archive.debian.org/g' /etc/apt/sources.list \
 && sed -i '/deb.*stretch-updates/d' /etc/apt/sources.list

# Atualizar apt e instalar dependências de compilação, permitindo pacotes não autenticados
RUN apt-get update \
 && apt-get install -y --allow-unauthenticated \
    libcurl4-openssl-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    unzip \
    git \
    zip \
    curl \
 && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias
RUN docker-php-ext-install curl mbstring xml zip pdo pdo_mysql pdo_pgsql


# Instalar Mcrypt
RUN apt-get update \
 && apt-get install -y --allow-unauthenticated libmcrypt-dev \
 && docker-php-ext-install mcrypt \
 && rm -rf /var/lib/apt/lists/*

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php \
 && mv composer.phar /usr/local/bin/composer

# Habilitar mod_rewrite do Apache (necessário para Laravel)
RUN a2enmod rewrite

# 🔹 Ajuste mínimo para evitar Forbidden
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
