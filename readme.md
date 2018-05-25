## Magic Mirror Remote

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


##### A simple homepage that allows you to remotely execute ssh commands to your client.

Remember to create a `.env` file in root of this project, and add these variables.
Change out to your credentials for `SSH_IP`, `SSH_USERNAME` and `SSH_PASSWORD`

```
APP_NAME=MagicMirrorRemote
APP_ENV=local
APP_KEY=base64:q6g5dQMTWVI5XkiOkq+IB9VsGa9hQSbCHDgNV5B3mao=
APP_DEBUG=false
APP_URL=http://localhost

SSH_IP=0.0.0.
SSH_USERNAME=username
SSH_PASSWORD=password 
```


Currently only supports turning on and off screen.

## Roadmap
- Shutdown
- Reboot
- Copy images from local to face_recognition folder
    - Possibility to allow taking pictures with webcam aswell before copying