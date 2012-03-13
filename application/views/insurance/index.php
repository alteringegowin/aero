<div class="row">
    <div class="span4">
        <h3>Search By Flight Code</h3>
        <form class="well form-search" action="<?php echo site_url('insurance/search/flight') ?>" method="POST">
            <input type="text" class="input-medium search-query" name="q">
            <button class="btn" type="submit">Search Code</button>
        </form>
    </div>
    <div class="span4">
        <h3>Search By Ticket No.</h3>
        <form class="well form-search" action="<?php echo site_url('insurance/search/ticket') ?>" method="POST">
            <input type="text" class="input-medium search-query" name="q">
            <button class="btn" type="submit">Search Ticket</button>
        </form>
    </div>
    <div class="span4">
        <h3>Search By Voucer No.</h3>
        <form class="well form-search" action="<?php echo site_url('insurance/search/voucer') ?>" method="POST">
            <input type="text" class="input-medium search-query" name="q">
            <button class="btn" type="submit">Search Voucer</button>
        </form>
    </div>
</div>