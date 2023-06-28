<?php
    // Get translations
    $lang = "fr_FR";
    $langFile = file_get_contents("lang/".$lang.".json");
    $translations = json_decode($langFile, true);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang ; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $translations["title"]; ?> - test2</title>
  <link rel="stylesheet" href="./scss/inline-form.css">
  <link rel="stylesheet" href="./scss/prompt-generator.css">
  <link rel="stylesheet" href="./scss/inline-theme.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Grandiflora+One&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
  <h1><?php echo $translations["title"]; ?></h1>
  <form action="#" method="post">
    <input type="hidden" id="design-type">
    <input type="hidden" id="design-type-text">
    <input type="hidden" id="aspect-ratio">
    <input type="hidden" id="aspect-ratio-text">
    <input type="hidden" id="text-no">
    <label for="initial-prompt"></label>
    <textarea placeholder='<?php echo $translations["yourDescription"]; ?>' name="initial-prompt" id="initial-prompt" cols="30" rows="10"></textarea>
    <?php echo $translations["designStyle"]; ?> : <span class="inl-select" id="inl-design-type" title='<?php echo $translations["designStyle"]; ?>'></span><br>
    <?php echo $translations["aspectRatio"]; ?> : <span class="inl-select" id="inl-aspect-ratio" title='<?php echo $translations["aspectRatio"]; ?>'></span><br>

    Ce que vous ne voulez pas : <span class="inl-text" id="inl-text-no" title="ce que ..."></span><br>

     <div class="popup">
       <span class="popuptext" id="myPopup"><?php echo $translations["copiedToClipboard"]; ?></span>
     </div>
     <button class="btn" type="button" onclick="toClipboard()"><?php echo $translations["copyToClipboard"]; ?></button>

  </form>
</div>

<div class="overlay" id="inl-popup">
  <a class="cancel" onclick="hideFormItem()"></a>
  <div class="overlay__content" id="inl-popup-content">
    something
  </div>
</div>


<script type="application/javascript" src="js/inline-functions.js"></script>
<script type="application/javascript">
  initInlineForm();

  function toClipboard() {
    let textToCopy = document.getElementById("initial-prompt").value
                     + ' ' + document.getElementById("design-type").value
                     + ' ' + document.getElementById("aspect-ratio").value
                     + ' --no ' + document.getElementById("text-no").value;
    navigator.clipboard.writeText(textToCopy);
  displayPopup();

  }
  const sleep = async (milliseconds) => {
      await new Promise(resolve => {
          return setTimeout(resolve, milliseconds)
      });
  };

  const displayPopup = async () => {
    let popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
    await sleep(1000);
    popup.classList.toggle("show");
  }
</script>
<div class="footer">
  <div><a href="https://stephanmorand.com"><img src="./img/logo-white.png" width="140" height="50" alt="logo stephan morand" /></a></div>
  <div><a href="https://www.stephanmorand.com/about/">Qui suis-je ?</a></div>
  <div><a href="https://portfolio.morand.pro">Autres projets</a></div>
  <div><a href="https://github.com/stmorand/prompt-generator">Code source (github)</a></div>
<footer>
</body>
</html>
