<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">									
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    New</span> 
                    <span class="fw-light">
                        Row
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btnAdd btn btn-link">Add new team</button>
                <div class="table-responsive">
                    <table class="display table table-hover mt-3" >
                        <thead class="">
                            <tr class="text-uppercase text-primary3 bg-white ">
                                <th>#</th>
                                <th>Team</th>
                                <th>Color</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loop through the prizes and generate table rows
                            $nos = 0;
                            foreach ($prizes as $row) {
                                
                                echo '<tr  style="background-color:' . htmlspecialchars($row['color']) . ';">';
                                    echo '<td>#' . $nos . '</td>';
                                    echo '<td>' . htmlspecialchars($row['text']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['color']) . '</td>';
                                    echo '<td>
                                            <div class="btn-group" >
                                                <button type="submit" data-id="'.$row['id'].'" class="btnEdit btn btn-primary btn-sm"><i class="far fa-edit"></i> </button>
                                                <button type="button" data-id="'.$row['id'].'" class="btnDelete btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                            </div>
                                        </td>';
                                echo '</tr>';
                                $nos += 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>