<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<script src="../plugin/cropit/dist/jquery.cropit.js"></script>
	<style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        display: block;
      }

      button {
        margin-top: 10px;
      }
    </style>
	<body>
    <form action="#">
      <div class="image-editor">
        <input type="file" class="cropit-image-input">
        <div class="cropit-preview"></div>
        <div class="image-size-label">
          Resize image
        </div>
        <input type="range" class="cropit-image-zoom-input">
        <input type="hidden" name="image-data" class="hidden-image-data" />
        <button type="submit">Submit</button>
      </div>
    </form>

    <div id="result">
      <code>$form.serialize() =</code>
      <code id="result-data"></code>
    </div>

    <script>
      $(function() {
        $('.image-editor').cropit();

        $('form').submit(function() {
          // Move cropped image data to hidden input
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          // Print HTTP request params
          var formValue = $(this).serialize();
          $('#result-data').text(formValue);

          // Prevent the form from actually submitting
          return false;
        });
      });
    </script>
  </body>
</html>