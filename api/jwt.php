<?php
if (isset($_GET['email'])) { $email= $_GET['email'];}
if (isset($_POST['pass'])) { $pass= $_POST['pass'];}


$private_key = "-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCXfDt2uqWVcxXHCrm5k0UvfolQlLhzAPp1KHoK1K+nQ3EaQW2O
Ill/Rre3SWH1Q3BGDUSXvjJQ16Di4ojQyAT7qNh4rYEMXoMLkjPQiSgbzp/SXBCP
SYqj+gL4xtLYoEa9spqDRIwCcm8z6NiUUPZtMEhAH7BipSbjeiS9663FeQIDAQAB
AoGBAJCAnWigmxt48Kkx/gCcDz9DAVGwzFJH+KKRvfle8UApAVb+Wrde5OiYWN+q
TJtdfVgVh/0IHY8oYfyMA97FLpo1CiNb/Gzp4Oz0np/icaplciwcp8IBrAy+gFrA
DxPSMy6+QayyhVcWMxE9gr7NLXauawz7tJ6K/BHSnaYeDdeRAkEA5qXMJkdFs28x
jXk9RBxWCkUz38e9cHdAOKy6NyJaCNamnrHKL1a2Xhawupf7ZfX/Im5vg8gP/FsD
ELNCGBYr7wJBAKgi4dX23GDiyFJrggR0PU97UrvSf1p3wVbIIMf2hMcj0mhgxl22
l8GNqs0SLPmxetSx0V4ZlYor/XE50nXmXRcCQCcwHlqWm3ocN2AhLE6pPdkq3uBz
sHUuXcQDXPRHKuL7jX3DGWYnpn6f/lEFx5oQTNQNzXanhEfNMt0gh+dNxRMCQEjP
2lcLccJvU2sF7ac6I3bxJBH8hXRLGioXvsJ5ymRm6e6TwjPBKBUE4auvLFTxfAzx
+IY0tCLDDB1lefPez/8CQAQH8ywHwBxw6ZDr3auAFk/07anZMOx50IhPK4USySis
HZ9YL/liUT4ml3FZ8gR9OzXYoFKd16CjJXF067Fdpbo=
-----END RSA PRIVATE KEY-----";

$public_key = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCDJ/mS9V51cYzud0+V4RH935ic
IsSvuSPheR4LhtdxoV5Kz4wadi9Pw/eYKgAW42dZrrnzCvJvpp57nnhNlgWJiKxz
78S1+NqdgpFmON23UndM77FKQk1lHmNpH9aunZASld5nHRYiZByEpLf5CNEsX9HV
wQN8vzE/MVtBcl8tMwIDAQAB
-----END PUBLIC KEY-----";

// echo $email."вот наше мыло";


class JWT
{
    private $headers;

    private $secret;

    public function __construct()
    {
        $this->headers = [
            'alg' => 'HS256', // we are using a SHA256 algorithm
            'typ' => 'JWT', // JWT type
            'iss' => 'jwt.local', // token issuer 
            'aud' => 'yandex.ru' // token audience СЮДА ДОМЕН
        ];
        $this->secret = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCXfDt2uqWVcxXHCrm5k0UvfolQlLhzAPp1KHoK1K+nQ3EaQW2O
Ill/Rre3SWH1Q3BGDUSXvjJQ16Di4ojQyAT7qNh4rYEMXoMLkjPQiSgbzp/SXBCP
SYqj+gL4xtLYoEa9spqDRIwCcm8z6NiUUPZtMEhAH7BipSbjeiS9663FeQIDAQAB
AoGBAJCAnWigmxt48Kkx/gCcDz9DAVGwzFJH+KKRvfle8UApAVb+Wrde5OiYWN+q
TJtdfVgVh/0IHY8oYfyMA97FLpo1CiNb/Gzp4Oz0np/icaplciwcp8IBrAy+gFrA
DxPSMy6+QayyhVcWMxE9gr7NLXauawz7tJ6K/BHSnaYeDdeRAkEA5qXMJkdFs28x
jXk9RBxWCkUz38e9cHdAOKy6NyJaCNamnrHKL1a2Xhawupf7ZfX/Im5vg8gP/FsD
ELNCGBYr7wJBAKgi4dX23GDiyFJrggR0PU97UrvSf1p3wVbIIMf2hMcj0mhgxl22
l8GNqs0SLPmxetSx0V4ZlYor/XE50nXmXRcCQCcwHlqWm3ocN2AhLE6pPdkq3uBz
sHUuXcQDXPRHKuL7jX3DGWYnpn6f/lEFx5oQTNQNzXanhEfNMt0gh+dNxRMCQEjP
2lcLccJvU2sF7ac6I3bxJBH8hXRLGioXvsJ5ymRm6e6TwjPBKBUE4auvLFTxfAzx
+IY0tCLDDB1lefPez/8CQAQH8ywHwBxw6ZDr3auAFk/07anZMOx50IhPK4USySis
HZ9YL/liUT4ml3FZ8gR9OzXYoFKd16CjJXF067Fdpbo=
-----END RSA PRIVATE KEY-----'; // change this to your secret code
    }

    public function generate(array $payload): string
    {
        $headers = $this->encode(json_encode($this->headers)); // encode headers
        $payload["exp"] = time() + 60; // add expiration to payload
        $payload = $this->encode(json_encode($payload)); // encode payload
        $signature = hash_hmac('SHA256', "$headers.$payload", $this->secret, true); // create SHA256 signature
        $signature = $this->encode($signature); // encode signature

        return "$headers.$payload.$signature";
    }

    private function encode(string $str): string
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '='); // base64 encode string
    }

    public function is_valid(string $jwt): string
    {
        $token = explode('.', $jwt); // explode token based on JWT breaks
        if (!isset($token[1]) && !isset($token[2])) {
            return "{\"error:\": $payload;}"; // fails if the header and payload is not set
        }
        $headers = base64_decode($token[0]); // decode header, create variable
        $payload = base64_decode($token[1]); // decode payload, create variable
        $clientSignature = $token[2]; // create variable for signature

        return $payload;

        if (!json_decode($payload)) {
            return "{\"error:\": $payload;}"; // fails if payload does not decode
        }

        if ((json_decode($payload)->exp - time()) < 0) {
             return "{\"error:\": $payload;}"; // fails if expiration is greater than 0, setup for 1 minute
        }

        if (isset(json_decode($payload)->iss)) {
            if (json_decode($headers)->iss != json_decode($payload)->iss) {
                 return "{\"error:\": $payload;}"; // fails if issuers are not the same
            }
        } else {
           return "{\"error:\": $payload;}"; // fails if issuer is not set 
        }

        if (isset(json_decode($payload)->aud)) {
            if (json_decode($headers)->aud != json_decode($payload)->aud) {
               return "{\"error:\": $payload;}"; // fails if audiences are not the same
            }
        } else {
            return "{\"error:\": $payload;}"; // fails if audience is not set
        }


    	$base64_header = $this->encode($headers);
        // в этой строке создаем наш хедер - оставляй его в том виде в котором он сейчас только замени вверху домен и приватный и публичный ключи

        $base64_payload = $this->encode($payload);
    	//строка с телом - сюда фигачим свой json вместо переменной payload



        $signature = hash_hmac('SHA256', $base64_header . "." . $base64_payload, $this->secret, true);
        //тут делем подпись для нашего jwt - считай личная подпись)
        


        $base64_signature = $this->encode($signature);
        // мы создали наш jwt объект и можем отправить его по их апишке
        return ($base64_signature === $clientSignature);
    }

}

		$arr =  array("$email");
		$test = new JWT;	
		$result = $test->generate($arr);

		echo "До шифра: ".$email." <br>после шифрования<br>". $result;

?>
