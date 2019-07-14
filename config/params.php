<?php
$alipay = array(
    //应用ID,您的APPID。
    'app_id' => "2016093000628163",

    //商户私钥，您的原始格式RSA私钥
    'merchant_private_key' => "MIIEpAIBAAKCAQEAq+pDnmYPhde30YA4rq6zXq5YQGgEcJjnyAasS89Cd6DdXvDJfp1WIIczNVXqE8oQaoNJuTrgnbN/tzPk0BiL4dsqB2efb3fBCRdSsLYFYdpbtIg9eXAk4e8SIYQMhEGaNeH8gNuRgYDAhP5g8bi1l5+c1NhE/yJFWoTzX3bmdUlYqE+IBq3vdMHhlCjT2BNfILY4N9IbrMR9+9gsX49rLsca8cdiFOitlz6T07bf8HO4TPsLTegph2C4Q5IAfyICK/3r1nnskgK+1Li7+n9ip/BcjU+dXGyEdo3sgHJ55xOgA8WFyjybcRyxexNcPPceuOyAa8ngWzpdulu8zFlMBwIDAQABAoIBAQCLgCE2m6Lk/NMQkXdtaB3tKpQ6Ty2rIKiUS7XsHlbVNBfuPn2C3LFS2+LV2M2FGWaQx9A/GmPCFDICu31kz0ZTE8DbGV7q2MYvVlmnQ0zCxqm7qQIZVMLZA2I3CCwP9hvotWRsO7+q0otmX/TSsQvJ6Z8dqBD05x5YAaJrSNRhPrpzBUEgcX10N4F6sESkqGcCoq5FWBas5+tIiYCGa+gtopb8UZY+UQT9LniSQL8I2Sv//SJOYd3WdeUVU37dJx+F7VC9hS2uGE8vav9GEnWOrw7BxCyo+08kyMbxiIEwBebIqhXYLDcHEsT3AIJpjdj1S6fW9qanD5kKBdpL65ghAoGBANwR8KoenOKZi8HDSXVoAsdkk8ex7E6wyTg3IFOE23WxWE0kgDbTPQa6Gl/eu8kzFsYSSVmkisYfaOclIGHmSllUjl0DqGsQ2BMPNCQ+CvnEL7mMym2DYpTGf+ybSAj2o7ZXUJCI4O4hnXXFQIqxjV+0KY9PiXQ0BjXQUh4PhwpzAoGBAMf7osyMnDzyrdiPff9tZw0GH+6WdxUSUxN4ou4/VFMGa9/FuiZO8OW9wf3//RDg3nQjvHw2BjzMLJkW7nN7LfpiCCTPIaGbUzxhb/UPzYZ6yd9TOigGSf+NvfTU2/F3WDcWTKT89AKOtCWTys0u1QF0Jpoj+vXqwBWJa2Wx1i8dAoGBAIJRmVuUX0EMvicS1vhQjHy5AY4avZ3nsHC6rEjo/vCWAX1FJSvSMWw/XojxI/DEcTL/9zG/b3JdfUiLwr5WmiaGHPvVw7ELO3kl4rGnj+ZSGBTf26u4RvNlDLH3TlQIge/jitDcTZ6Wh2ELWuoGtHo8/PNhnTsT562MXGRyu3wjAoGAFESKgVSW2Q53VAVm7aY21XkTb2jMdNRAmy6UxLSiZS+3axxs+0jw3TfYG1gAW9+ObBLbHXOUOkEvG+zZCdcoF8IrtR9Q90H4s5vkbt/FIqX7I6kZscjBYycIY3HXQKepxxt5dRc127R+yXgrC5R9fgI5j1GqM5YxFX2x5sKZRHkCgYBZNA8HPtSvI0qeB8/4RryIZ07zPcidOSXQvepgFclAT8nQijORR4y9lkDYAlncYyyoltGwtfFhv0ees5f+MD+FgZmUJx9KUuLGlrXKuINwXSNjOkYo6AS/qeALCckShxZUiRYDf89kCCWGp2H3oGApbrWdMIcw0W1CIvOmdfY7ww==",

    //异步通知地址
    'notify_url' => "http://to-group.top/machine/web/notify.php",

    //同步跳转
    'return_url' => "",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type' => "RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAopT9A/Xqj7suZ4RnovQv/dsY6IOiUCMjg+MPsJ72W+W2a1qE/jWvzB0bCGMr4lwExUNgRr2qweKR+L/sNCfhIZjhZJHn1jqN98l61XMz4mRxc1/6uxu+2k6B/wVRVvb7tCh9PEZAdDqF7HbdJj9dzePd3uwRte9IkYzDSjNNeEK3a77mo0o3tlRRQmFVm1rYQHaRye2HuqWtb/HkuDq/m07BbwE8H+qxY12KtW3Swovz+TNGI5kstGLY96z5+0fpTNl96iwQ4DFhRJvIfKe2maeo7iKlfVX0gvG7GlccF3W+ewYQ2PoLjA4wP324Qn3svG5MX+0C8PASNoNXVOZ4fwIDAQAB",

    //最大查询重试次数
    'MaxQueryRetry' => "10",

    //查询间隔
    'QueryDuration' => "3"
);

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'alipay' => $alipay
];
