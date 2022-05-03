<?php

require_once '../private/initialize.php';

$page_title = ' - Front Page';

include '../private/shared/header.php';

?>

<main>

  <h1>This is a simple test front page</h1>

  <section class="content grid content-grid">

    <aside class="tweets">

    <a class="twitter-timeline" data-width="300" data-height="800" data-theme="light" href="https://twitter.com/MichaelHoumann?ref_src=twsrc%5Etfw">Tweets by MichaelHoumann</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    </aside>

    <section>

      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, dolores! Deleniti sit, aliquam inventore veniam corporis blanditiis. Cupiditate molestias iure provident rerum voluptatum aliquid tenetur similique animi assumenda, tempora ratione aliquam odit vel magni architecto adipisci facere eos omnis amet alias iusto aperiam! Aut necessitatibus repellat vel eius, molestiae consequatur.

    </section>


  </section>
</main>

<?php include '../private/shared/footer.php';?>