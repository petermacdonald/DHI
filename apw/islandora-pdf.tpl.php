<?php

/**
 * @file
 * This is the template file for the pdf object
 *
 * @TODO: Add documentation about this file and the available variables
 */
?>

<div class="islandora-pdf-object islandora">
  <div class="islandora-pdf-content-wrapper clearfix">
    <?php if (isset($islandora_content)): ?>
      <div class="islandora-pdf-content">
        <?php print $islandora_content; ?>
      </div>
      <!--
      <a href=http://apw.dhinitiative.org/islandora/object/apw%3A165/datastream/OBJ/download">Download the Original-dummy</a>-
      <?php print $islandora_download_link; echo '&nbsp;|&nbsp;<a class="islandora-pdf-link" href="http://dora.hpc.hamilton.edu:8080/solr/select?indent=on&version=2.2&q=dc.relation%3AisPageOf&fq=&start=0&rows=10&fl=*&qt=standard&wt=standard&explainOther=&hl.fl=">Download Original-live</a>'; ?>
      -->
      <?php echo "PID = ".$dc_array['dc:relation']['value']; ?>
    <?php endif; ?>
  <div class="islandora-pdf-sidebar">
    <?php if (!empty($dc_array['dc:description']['value'])): ?>
      <h2><?php print $dc_array['dc:description']['label']; ?></h2>
      <p><?php print $dc_array['dc:description']['value']; ?></p>
    <?php endif; ?>
    <?php if($parent_collections): ?>
      <div>
        <h2><?php print t('In collections'); ?></h2>
        <ul>
          <?php foreach ($parent_collections as $collection): ?>
            <li><?php print l($collection->label, "islandora/object/{$collection->id}"); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
  </div>
  <fieldset class="collapsible collapsed islandora-pdf-metadata">
  <legend><span class="fieldset-legend"><?php print t('Extended details'); ?></span></legend>
    <div class="fieldset-wrapper">

<!-- START OF DHI ADDED ROUTINE TO ELIMINATE EMPTY DC FIELDS FROM DISPLAYING, _pjm -->
    <div class="fieldset-wrapper">
    	      <dl class="islandora-inline-metadata islandora-pdf-fields">
        <?php $row_field = 0; ?>
        <?php foreach ($dc_array as $key => $value): ?>
          <?php if(strlen($value['value']) > 0) { ?>
          <dt class="<?php print $value['class'].'x'.$value; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print $value['label']; ?>
          </dt>
          <dd class="<?php print $value['class']; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print $value['value']; ?>
          </dd>
          <?php } ?>
          <?php $row_field++; ?>
        <?php endforeach; ?>
      </dl>
<!-- END OF DHI ADDED ROUTINE, _pjm -->    
 
    	<!-- ORIGINAL CODE SUPPRESSED BY _pjm, 2013-09-13
      <dl class="islandora-inline-metadata islandora-pdf-fields">
        <?php $row_field = 0; ?>
        <?php foreach ($dc_array as $key => $value): ?>
          <?php if(strlen($value['value']) > 0) { ?>
          <dt class="<?php print $value['class'].'x'.$value; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print $value['label']; ?>
          </dt>
          <dd class="<?php print $value['class']; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print $value['value']; ?>
          </dd><?php } ?>
          <?php $row_field++; ?>
        <?php endforeach; ?>
      </dl>
      -->
    </div>
  </fieldset>
</div>
