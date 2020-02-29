

@if (in_array("show", $actions))
    <a class="" title="@lang('rapyd::rapyd.show')" href="{!! $uri !!}?show={!! $id !!}"><span class="glyphicon glyphicon-eye-open"> </span></a>
@endif
@if (in_array("modify", $actions))
    <a class="" title="@lang('rapyd::rapyd.modify')" href="{!! $uri !!}?modify={!! $id !!}"><span class="glyphicon glyphicon-edit"> </span></a>
@endif
@if (in_array("delete", $actions))
    <!--<a class="text-danger confirm" title="@lang('rapyd::rapyd.delete')" href="{!! $uri !!}?delete={!! $id !!}"><span class="glyphicon glyphicon-trash"> </span></a>-->
	  <a class="text-danger confirm{!! $id !!}" title="@lang('rapyd::rapyd.delete')" href="#"><span class="glyphicon glyphicon-trash"> </span></a>
@endif
<script>

                                $('.confirm{!! $id !!}').on('click', function () {
                                    $.confirm({
                                        title: 'Confirm!',
                                        content: 'Confirm Delete Row?',
                                        buttons: {
                                            confirm: function () {
                                               // $.get('{!! $uri !!}?delete={!! $id !!}}');
												 window.location.href = '{!! $uri !!}?delete={!! $id !!}}';
                                            },
                                            cancel: function () {
                                               }
                                        }
                                    });
                                });
                            
</script>
