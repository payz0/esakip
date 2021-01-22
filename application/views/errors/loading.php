<style>
      .sk-cube-grid {
        width: 40px;
        height: 40px;
        margin: 15% auto;
      }

      .sk-cube-grid .sk-cube {
        width: 33%;
        height: 33%;
        background-color: #333;
        float: left;
        -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
                animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out; 
      }
      .sk-cube-grid .sk-cube1 {
        -webkit-animation-delay: 0.2s;
        background-color: red;
                animation-delay: 0.2s; }
      .sk-cube-grid .sk-cube2 {
        -webkit-animation-delay: 0.3s;
        background-color: yellow;
                animation-delay: 0.3s; }
      .sk-cube-grid .sk-cube3 {
        background-color: green;
        -webkit-animation-delay: 0.4s;
                animation-delay: 0.4s; }
      .sk-cube-grid .sk-cube4 {
        background-color: blue;
        -webkit-animation-delay: 0.1s;
                animation-delay: 0.1s; }
      .sk-cube-grid .sk-cube5 {
        background-color: orange;
        -webkit-animation-delay: 0.2s;
                animation-delay: 0.2s; }
      .sk-cube-grid .sk-cube6 {
        -webkit-animation-delay: 0.3s;
                animation-delay: 0.3s; }
      .sk-cube-grid .sk-cube7 {
        -webkit-animation-delay: 0s;
                animation-delay: 0s; }
      .sk-cube-grid .sk-cube8 {
        -webkit-animation-delay: 0.1s;
                animation-delay: 0.1s; }
      .sk-cube-grid .sk-cube9 {
        -webkit-animation-delay: 0.2s;
                animation-delay: 0.2s; }

      @-webkit-keyframes sk-cubeGridScaleDelay {
        0%, 70%, 100% {
          -webkit-transform: scale3D(1, 1, 1);
                  transform: scale3D(1, 1, 1);
        } 35% {
          -webkit-transform: scale3D(0, 0, 1);
                  transform: scale3D(0, 0, 1); 
        }
      }

      @keyframes sk-cubeGridScaleDelay {
        0%, 70%, 100% {
          -webkit-transform: scale3D(1, 1, 1);
                  transform: scale3D(1, 1, 1);
        } 35% {
          -webkit-transform: scale3D(0, 0, 1);
                  transform: scale3D(0, 0, 1);
        } 
      }
    </style>
<div ng-app="myApp">
    <div ng-controller="apCont" style="position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100vh;
        background: white;
        z-index: 99999;" ng-if="loading">
        <div class="sk-cube-grid" >
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
        </div>
    </div>
