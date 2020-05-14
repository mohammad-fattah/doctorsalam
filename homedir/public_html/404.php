<?php include('api/v1/settings/Header.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <link href="<?php echo $site_logo; ?>" rel="shortcut icon" type="image/x-icon" />
  <title>سامانه آنلاین خرید بیمه | <?php echo $site_name; ?></title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<style>
    @font-face {
      font-family: iranyekan;
      font-style: normal;
      font-weight: bold;
      src: url("/assets/fonts/fonts/eot/iranyekanwebbold.eot");
      src: url("/assets/fonts/fonts/eot/iranyekanwebbold.eot?#iefix") format("embedded-opentype"), 
      url("/assets/fonts/iranyekanwebbold.woff2") format("woff2"),
      url("/assets/fonts/iranyekanwebbold.ttf") format("truetype");
  }
  
  @font-face {
      font-family: iranyekan;
      font-style: normal;
      font-weight: 300;
      src: url("/assets/fonts/fonts/eot/iranyekanweblight.eot");
      src: url("/assets/fonts/fonts/eot/iranyekanweblight.eot?#iefix") format("embedded-opentype"), 
      url("/assets/fonts/iranyekanweblight.woff2") format("woff2"), 
      url("/assets/fonts/iranyekanweblight.ttf") format("truetype");
  }
  
  @font-face {
      font-family: iranyekan;
      font-style: normal;
      font-weight: normal;
      src: url("/assets/fonts/fonts/eot/iranyekanwebregular.eot");
      src: url("/assets/fonts/fonts/eot/iranyekanwebregular.eot?#iefix") format("embedded-opentype"), 
      url("/assets/fonts/iranyekanwebregular.woff2") format("woff2"), 
      url("/assets/fonts/iranyekanwebregular.woff") format("woff"), 
      url("/assets/fonts/iranyekanwebregular.ttf") format("truetype");
  }
  
  @font-face {
      font-family: iranyekan;
      font-style: normal;
      font-weight: normal;
      src: url('/assets/fonts/fonts/eot/iranyekanwebregular(fanum).eot');
      src: url('/assets/fonts/fonts/eot/iranyekanwebregular(fanum).eot?#iefix') format('embedded-opentype'), /* IE6-8 */
      url('/assets/fonts/iranyekanwebregular(fanum).woff2') format('woff2'), /* FF39+,Chrome36+, Opera24+*/
      url('/assets/fonts/iranyekanwebregular(fanum).woff') format('woff'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
      url('/assets/fonts/iranyekanwebregular(fanum).ttf') format('truetype');
  }
  
  body {
      direction: rtl;
  }
  
  .container,
  .content {
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex
  }
  
  body {
      margin: 0;
      font-family: "iranyekan"
  }
  
  a {
      text-decoration: none;
      color: #0085B6
  }
  
  a:hover {
      text-decoration: none;
      color: #00709D
  }
  
  h1 {
      color: #444;
      font-size: 25px;
      line-height: 44px;
      margin-bottom: 20px
  }
  
  p {
      color: #666;
      font-size: 16px;
      line-height: 24px
  }
  
  .container {
      display: flex;
      margin: 0 auto;
      max-width: 1200px;
      min-height: 100vh;
      align-items: center
  }
  
  .content {
      display: flex;
      width: 100%
  }
  
  .message {
      margin-left: 30px;
      padding: 60px 15px;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      width: 50%;
  }
  
  .message-content {
      width: 100%
  }
  
  .message-logo {
      max-width: 100%
  }
  
  .image {
      text-align: center;
      width: 50%;
      margin-left: 30px
  }
  
  .image>img {
      max-width: 450px
  }
  
  a.btn {
      color: #fff;
      padding: 5px 10px;
      background: #002f57;
      border-radius: 2px;
      transition: .3s background ease;
  }
  
  a.btn:hover {
      background: #fcd957;
      color: #002f57
  }
  
  .author {
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex-direction: row;
      margin-top: 50px
  }
  
  .author-credit {
      font-size: 12px
  }
  
  .author-avatar {
      margin-right: 5px;
      margin-top: 11px;
      height: 25px
  }
  
  @media screen and (max-width:1042px) {
      .message-content {
          width: 80%
      }
  }
  
  @media screen and (max-width:1023px) {
      .image,
      .message {
          text-align: center;
          width: 100%
      }
      .content {
          flex-wrap: wrap;
          max-width: 545px;
          margin: 0 auto;
          position: relative;
          padding-top: 20px
      }
      .image {
          margin-right: 0
      }
      .image>img {
          max-width: 450px;
          margin-top: 30px;
      }
      .message {
          margin-left: 0
      }
      .message-logo {
          position: absolute;
          top: 25px;
          right: 25px
      }
      .message-content {
          margin: 0 auto;
          width: 100%
      }
      .author {
          justify-content: center
      }
  }
  
  @media screen and (max-width:414px) {
      .image>img {
          max-width: 243px
      }
      .message {
          width: 100%;
          text-align: center
      }
      .message-content {
          max-width: 414px
      }
      .message-logo {
          position: absolute;
          top: 20px
      }
      h1 {
          font-size: 28px;
          line-height: 37px
      }
      .author-avatar {
          height: 24px
      }
  }
</style>
</head>

<body>
  <div class="container">
    <div class="content">
      <div class="image">
        <img src="/assets/img/404.svg">
      </div>
      <div class="message">
        <img class="message-logo" src="/assets/img/logo.png" height="41px">
        <div class="message-content">
          <h1>متاسفانه صفحه ای که دنبالش بودید پیدا نشد.</h1>
          <p>میتونید به صفحه اصلی سایت برگردید، یا در صورتی که مایلید میتونید این مساله رو به ما اطلاع بدید.</p>
          <p style="text-align:center"><?php echo $phone;  ?></p>
          <a class="btn home-btn" href="/">صفحه اصلی</a>
          <a class="btn" href="/contact">تماس با ما</a>

        </div>
      </div>
    </div>
  </div>
</body></html>