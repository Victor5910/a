<?php 
    class Usuario{
        private string $correo;
        private string $nombre;
        private string $apellidos;
        private string $nif;
        private bool $activo;
        private string $avatar;
        private string $hash;
        private string $rol; 

        public function __construct($correo, $nombre, $apellidos, $nif, $avatar, $hash)
        {
            $this->correo = $correo;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->nif = $nif;
            $this->activo = false;
            $this->avatar = $avatar;
            $this->hash = $hash;
            $this->rol = "cliente";
        }

        public function getHash(): string
        {
                return $this->hash;
        }

        public function getAvatar(): string
        {
                return $this->avatar;
        }

        public function setAvatar(string $avatar): self
        {
                $this->avatar = $avatar;

                return $this;
        }

        public function getRol(): string
        {
                return $this->rol;
        }

        public function setRol(string $rol): self
        {
                $this->rol = $rol;

                return $this;
        }

        public function getActivo(): bool
        {
                return $this->activo;
        }

        public function setActivo(bool $activo): self
        {
                $this->activo = $activo;

                return $this;
        }

        public function getNif(): string
        {
                return $this->nif;
        }

        public function getApellidos(): string
        {
                return $this->apellidos;
        }

        public function getNombre(): string
        {
                return $this->nombre;
        }

        public function getCorreo(): string
        {
                return $this->correo;
        }
    }

    
    
?>