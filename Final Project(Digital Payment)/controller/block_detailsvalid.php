<?php
   include '../model/model.php';

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $block=getLatestBlock($_SESSION['verified_block_id']);
        insertVerifyBlock($block['block_no'], $block['transaction'], $block['user_idd']);
       
        deleteBlock($_SESSION['verified_block_id']);
        header("Location: verify_blocks.php");
   }
   function blockDetail($id) {
   if(!is_null($id))
   {
      return getLatestBlock($id);
   }
      
   }
?>