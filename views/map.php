<?php
//Render map container div
/* @var $displayMode string*/
if ($displayMode == 'normal') { ?>
    <div id="map"></div>
<?php } else { ?>
    <!-- Trigger the modal with a button -->
    <a data-toggle="modal" data-target="#myModal">Select location</a>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg modal-xlg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Click on map or drag the marker to select position</h4>
                </div>
                <div class="modal-body">
                    <div id="map"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?php } ?>