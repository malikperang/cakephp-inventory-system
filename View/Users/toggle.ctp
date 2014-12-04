<?php echo $this->Html->image('icons/allow-' . $status . '.png',
                            array('onclick' => 'published.toggle("status-'.$user_id.'", "'.$this->Html->url('/users/toggle/').$user_id.'/'.$status.'");',
                                  'id' => 'status-'.$user_id
        ));
?>