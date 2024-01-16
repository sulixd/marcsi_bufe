<?php

class GoogleOAuth {

     public function __construct(
          private string $client_id, 
          private string $client_secret, 
          private string $redirect_uri, 
          private string $version
     ) {}

     public function createUrl(): string {
          $params = [
               'response_type' => 'code',
               'client_id' => $this->client_id,
               'redirect_uri' => $this->redirect_uri,
               'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
               'access_type' => 'offline',
               'prompt' => 'consent'
          ];
          return 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);
     }

     public function verify(string $code): string|false {
          $params = [
               'code' => $code,
               'client_id' => $this->client_id,
               'client_secret' => $this->client_secret,
               'redirect_uri' => $this->redirect_uri,
               'grant_type' => 'authorization_code'
          ];

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

          curl_setopt($ch, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          curl_close($ch);
          try {
               $data = json_decode($response, true);
          } catch(Exception) {
               return false;
          }
          $id_token = $data['id_token'];
          $user = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $id_token)[1]))), true);
          return $user['email'] ?? false;
     }

}
