<!-- loader.php -->

<div id="loader-container">
   <div id="loader"></div>
   <p>loading...</p>
</div>

<style>
   /* Loader Styles */
   #loader-container {
       position: fixed;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background: rgba(255, 255, 255, 0.8);
       display: flex;
       justify-content: center;
       align-items: center;
       z-index: 9999;
   }

   #loader {
       border: 7px solid #3498db;
       border-top: 7px solid #f1f1f1;
       border-radius: 50%;
       width: 50px;
       height: 50px;
       animation: spin 1s linear infinite;
   }

   @keyframes spin {
       0% { transform: rotate(0deg); }
       100% { transform: rotate(360deg); }
   }
</style>

<script>
   // Function to hide the loader after 2 seconds
   function hideLoader() {
       var loaderContainer = document.getElementById("loader-container");
       loaderContainer.style.display = "none";
   }

   // Add an event listener to call hideLoader after 2 seconds
   window.addEventListener("load", function () {
       setTimeout(hideLoader, 2000); // 2000 milliseconds = 2 seconds
   });
</script>
