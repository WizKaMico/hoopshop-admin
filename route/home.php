               <div class="uk-width-1-2@l">
                    <div class="uk-card uk-card-default uk-card-small uk-card-hover uk-border-rounded">
                        <div class="uk-card-header">
                            <span class="uk-text-muted">MY PRODUCT</span>
                        </div>
                        <div class="uk-card-body">
                           <div class="tab">
                            <button class="tablinks1 active" onclick="openProductList(event, 'ShoeList')">SHOE</button>
                            <button class="tablinks1" onclick="openProductList(event, 'ShirtList')">SHIRT</button>
                            </div>

                            <div id="ShoeList" class="tabcontent1" style="display: block;">
                            <hr />
                            <table id="shoeListD" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ITEM</th>
                                        <th>COLORWAY & SIZE</th>
                                        <th>CONDITION</th>
                                        <th>ACTION</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $shoe = $hoopCont->getShoeList(); 
                                    if (!empty($shoe)) {
                                        foreach ($shoe as $key => $value) {
                                    ?>
                                    <tr>
                                       <td><?php echo $shoe[$key]['product']; ?></td>
                                       <td><?php echo $shoe[$key]['color']; ?>, <?php echo $shoe[$key]['size']; ?> (<?php echo $shoe[$key]['fitting']; ?>)</td>
                                       <td><?php echo $shoe[$key]['conditions']; ?></td> 
                                       <td>
                                       <a href='home.php?view=DETAILS&sku=<?php echo $shoe[$key]['sku']; ?>' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span> VIEW </a>
                                       </td>     
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                            </div>
                            <div id="ShirtList" class="tabcontent1" style="display: none;">
                            <hr />
                            <table id="shirtListD" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>ITEM</th>
                                        <th>COLORWAY</th>
                                        <th>ACTION</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $shirt = $hoopCont->getShirtList(); 
                                    if (!empty($shirt)) {
                                        foreach ($shirt as $key => $value) {
                                    ?>
                                    <tr>
                                       <td></td>     
                                       <td></td>
                                       <td></td>
                                       <td></td>      
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l uk-width-1-2@xl">
                    <div class="uk-card uk-card-default uk-card-small uk-card-hover uk-border-rounded">
                        <div class="uk-card-header">
                            <span class="uk-text-muted">CREATE PRODUCT</span>
                        </div>
                        <div class="uk-card-body">
                            <div class="uk-overflow-auto">
                            <div class="tab">
                                <button class="tablinks active" onclick="openProduct(event, 'Shoe')">SHOE</button>
                                <button class="tablinks" onclick="openProduct(event, 'Shirt')">SHIRT</button>
                            </div>

                            <div id="Shoe" class="tabcontent" style="display: block;">
                               <form action="home.php?view=HOME&action=addShoe" method="POST">
                                    <div class="form-group">
                                    <label for="email">PRODUCT:</label>
                                    <input type="text" class="form-control"  placeholder="Enter product" name="product" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="pwd">BRAND:</label>
                                    <select class="form-control" name="brand" required>
                                       <option value="NIKE">NIKE</option>
                                       <option value="ADIDAS">ADIDAS</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="pwd">CONDITION:</label>
                                    <select class="form-control" name="condition" required>
                                       <option value="BNDS">BNDS</option>
                                       <option value="VNDS">VNDS</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="email">COLOR:</label>
                                    <input type="text" class="form-control"  placeholder="Enter color" name="color" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="email">SIZE:</label>
                                    <input type="text" class="form-control"  placeholder="Enter size" name="size" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="pwd">SIZE FIT:</label>
                                    <select class="form-control" name="fitting" required>
                                       <option value="MEN">MEN</option>
                                       <option value="WOMEN">WOMEN</option>
                                       <option value="UNISEX">UNISEX</option>
                                    </select>
                                    </div>
                                    <button type="submit" name="add_shoe" style="width:100%;" class="btn btn-default">Submit</button>
                                </form>
                            </div>

                            <div id="Shirt" class="tabcontent">
                                <form action="home.php?view=HOME&action=addShirt" method="POST">
                                    <div class="form-group">
                                    <label for="email">PRODUCT:</label>
                                    <input type="text" class="form-control"  placeholder="Enter product" name="product" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="email">COLOR:</label>
                                    <input type="text" class="form-control"  placeholder="Enter color" name="color" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="email">SIZE:</label>
                                    <select class="form-control" name="size" required>
                                       <option value="SMALL">SMALL</option>
                                       <option value="MEDIUM">MEDIUM</option>
                                       <option value="LARGE">LARGE</option>
                                       <option value="XLARGE">XLARGE</option>
                                       <option value="XXLARGE">XXLARGE</option>
                                    </select>
                                    </div>
                                    <button type="submit" name="add_shirt" style="width:100%;" class="btn btn-default">Submit</button>
                                </form> 
                            </div>
                            </div>
                        </div>
                    </div>
                </div>