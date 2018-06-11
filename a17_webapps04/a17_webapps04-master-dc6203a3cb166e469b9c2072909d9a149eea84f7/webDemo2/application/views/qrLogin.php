<html>
  <head>
    <title>QR scanner</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/qrLogin.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>
  <body>
    <div id="app">
        <!--
      <div class="sidebar">
        <section class="scans">
          <h2>Scans</h2>
          <ul v-if="scans.length === 0">
            <li class="empty">{result}</li>
          </ul>
          <transition-group name="scans" tag="ul">
            <li v-for="scan in scans" :key="scan.date" :title="scan.content"> </li>
          </transition-group>
        </section>
      </div>
        -->
      <div class="preview-container">
        <video id="preview"></video>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/qrLogin_test.js"></script>
  </body>
</html>