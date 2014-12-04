<h1 class="page-header">User Permissions</h1>
<?php echo $this->Html->css(array('treeview'), null,array('block' => 'css'));?>
<?php echo $this->Html->script(array('jquery.cookie','treeview','acos','twitter/bootstrap-buttons'), array('block' => 'script'));

?>
<div class="col-lg-7">
    <div class="">
        <button class="btn btn-danger" data-loading-text="loading..." >Generate</button>
    </div>
    <div id="acos">
        <?php echo $this->Tree->generate($results, array('alias' => 'alias', 'model' => 'Aco', 'id' => 'acos-ul', 'element' => '/permission-node')); ?>
    </div>

<div class="col-lg-7">
    <div id="aco-edit"></div>
</div>

<?php
$this->append('script');
?>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#acos").treeview({collapsed: true});
    });
    $(function() {
        var btn = $('.btn').click(function () {
            btn.button('loading');
            $.get('<?php echo $this->Html->url('/user_permissions/sync');?>', {},
                function(data){
                    btn.button('reset');
                    $("#acos").html(data);
                }
            );
        })
    });
    </script>
<?php
$this->end();
?>