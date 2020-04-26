<?php
/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(0);
?>
<nav>
    <div class="clearfix pager">
        <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
        <div <?= $pager->hasPrevious() ? '' : 'class="disabled"' ?>>
            <a class="btn btn-primary float-left" href="<?= $pager->getPrevious() ?? '#' ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pager.newer') ?></span>
            </a>
        </div>
        <div <?= $pager->hasNext() ? '' : 'class="disabled"' ?>>
            <a class="btn btn-primary float-right" href="<?= $pager->getnext() ?? '#' ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.older') ?></span>
            </a>
        </div>
        
    </div>
</nav>

