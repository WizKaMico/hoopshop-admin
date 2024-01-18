               <div class="uk-width-1-2@l">
                    <div class="uk-card uk-card-default uk-card-small uk-card-hover uk-border-rounded">
                        <div class="uk-card-header">
                            <span class="uk-text-muted"><b><?php echo strtoupper($product[0]['product']); ?> - <?php echo strtoupper($product[0]['sku']); ?></b></span>
                        </div>
                        <div class="uk-card-body">
                        <div class="tab">
                            <button class="tablinks active" onclick="openProductInfo(event, 'Shoe')">SHOE</button>
                            <button class="tablinks" onclick="openProductInfo(event, 'Market')">MARKET VERIFICATION</button>
                            <button class="tablinks" onclick="openProductInfo(event, 'Price')">MARKET PRICE</button>
                            <button class="tablinks" onclick="openProductInfo(event, 'PriceIt')">PRICING</button>
                        </div>

                        <div id="Shoe" class="tabcontent" style="display: block;">
                          <hr />
                          <div class="container">
                            <div id="example1">
                                <img src="<?php echo $product_image[0]['shoeappearance']; ?>" />
                                <p style="text-align:center; margin-top:5px;">SHOE APPEARANCE</p>
                            </div>
                            <div id="example1">
                               <img src="<?php echo $product_image[0]['shoeinside']; ?>" />
                               <p style="text-align:center; margin-top:5px;">SHOE INSIDE</p>
                            </div>
                            <div id="example1">
                               <img src="<?php echo $product_image[0]['shoeinsole']; ?>" />
                               <p style="text-align:center; margin-top:5px;">SHOE INSOLE</p>
                            </div>
                          </div>
                          <hr />
                          <div class="container">
                            <div id="example1">
                               <img src="<?php echo $product_image[0]['shoeinsolestitch']; ?>" />
                               <p style="text-align:center; margin-top:5px;">SHOE SOLE STITCH</p>
                            </div>
                            <div id="example1">
                               <img src="<?php echo $product_image[0]['shoebox']; ?>" />
                               <p style="text-align:center; margin-top:5px;">SHOE BOX</p>
                            </div>
                            <div id="example1">
                               <img src="<?php echo $product_image[0]['shoedate']; ?>" />
                               <p style="text-align:center; margin-top:5px;">SHOE DATE</p>
                            </div>
                          </div>
                          <hr />


                        </div>

                        <div id="Market" class="tabcontent" style="display: none;">
                            <hr />
                            <form action="home.php?view=DETAILS&action=ShoeValue" method="POST">
                                    <div class="form-group">
                                    <label for="email">SHOE UPC:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="text" class="form-control" name="upc" required>
                                    </div>
                                    <button type="submit" name="check_price" style="width:100%;" class="btn btn-default">Submit</button>
                            </form> 
                        </div>

                        <div id="Price" class="tabcontent" style="display: none;">
                            <hr />
                            <table id="shoeListVerif" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>UPC</th>
                                        <th>ITEM</th>
                                        <th>COLORWAY & SIZE</th>
                                        <th>IMAGE</th>
                                        <th>DATE</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $shoe = $hoopCont->getShoeMarketPrice($sku); 
                                    if (!empty($shoe)) {
                                        foreach ($shoe as $key => $value) {
                                    ?>
                                    <tr>
                                       <td><?php echo $shoe[$key]['upc_remit']; ?></td>
                                       <td><?php echo $shoe[$key]['title']; ?></td>
                                       <td><?php echo $shoe[$key]['color']; ?>, <?php echo $shoe[$key]['weight']; ?>, <?php echo $shoe[$key]['price']; ?> <?php echo $shoe[$key]['currency']; ?></td>
                                       <td><img src="<?php echo $shoe[$key]['image']; ?>"></td> 
                                       <td><?php echo $shoe[$key]['date_verified']; ?></td>    
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>    
                        </div>

                        <div id="PriceIt" class="tabcontent" style="display: none;">
                            <hr />
                            <form action="home.php?view=DETAILS&action=AmountPosting" method="POST">
                                    <div class="form-group">
                                    <label for="email">SHOE AMOUNT:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="hidden" class="form-control" name="product" value="<?php echo $product[0]['product']; ?>" required>
                                    <input type="number" class="form-control" name="pricing" required>
                                    </div>
                                    <button type="submit" name="add_pricing" style="width:100%;" class="btn btn-default">Submit</button>
                               </form> 
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
                            <button class="tablinks1 active" onclick="openShoeImages(event, 'ShoeAppearance')">APPEARANCE</button>
                            <button class="tablinks1" onclick="openShoeImages(event, 'ShoeInside')">INSIDE</button>
                            <button class="tablinks1" onclick="openShoeImages(event, 'ShoeInsole')">INSOLE</button>
                            <button class="tablinks1" onclick="openShoeImages(event, 'ShoeInsoleStitch')">INSOLE STITCH</button>
                            <button class="tablinks1" onclick="openShoeImages(event, 'ShoeBox')">SHOE BOX</button>
                            <button class="tablinks1" onclick="openShoeImages(event, 'ShoeDate')">SHOE DATE</button>
                            </div>

                            <div id="ShoeAppearance" class="tabcontent1" style="display: block;">
                            <hr />
                              <form action="home.php?view=DETAILS&action=ShoeAppearance" enctype="multipart/form-data" method="POST">
                                    <div class="form-group">
                                    <img src="#" alt="Uploaded photo" id="uploadedPhoto1" style="display: none; margin: 0 auto; max-width: 300px; max-height: 300px;">
                                    <label for="email">SHOE APPEARANCE:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="file" class="form-control" name="photo" id="photoInput1" onchange="displayPhoto(event, 'uploadedPhoto1')" required>
                                    </div>
                                    <button type="submit" name="add_details" style="width:100%;" class="btn btn-default">Submit</button>
                               </form> 
                            </div>

                            <div id="ShoeInside" class="tabcontent1" style="display: none;">
                            <hr />
                               <form action="home.php?view=DETAILS&action=ShoeInside" enctype="multipart/form-data" method="POST">
                                    <div class="form-group">
                                    <img src="#" alt="Uploaded photo" id="uploadedPhoto2" style="display: none; margin: 0 auto; max-width: 300px; max-height: 300px;">
                                    <label for="email">SHOE INSIDE:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="file" class="form-control" name="photo" id="photoInput2" onchange="displayPhoto(event, 'uploadedPhoto2')" required>
                                    </div>
                                    <button type="submit" name="add_details" style="width:100%;" class="btn btn-default">Submit</button>
                               </form> 
                            </div>

                            <div id="ShoeInsole" class="tabcontent1" style="display: none;">
                            <hr />
                               <form action="home.php?view=DETAILS&action=ShoeInsole" enctype="multipart/form-data" method="POST">
                                    <div class="form-group">
                                    <img src="#" alt="Uploaded photo" id="uploadedPhoto3" style="display: none; margin: 0 auto; max-width: 300px; max-height: 300px;">
                                    <label for="email">SHOE INSOLE:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="file" class="form-control" name="photo" id="photoInput3" onchange="displayPhoto(event, 'uploadedPhoto3')" required>
                                    </div>
                                    <button type="submit" name="add_details" style="width:100%;" class="btn btn-default">Submit</button>
                               </form> 
                            </div>

                            <div id="ShoeInsoleStitch" class="tabcontent1" style="display: none;">
                            <hr />
                               <form action="home.php?view=DETAILS&action=ShoeInsoleStitch" enctype="multipart/form-data" method="POST">
                                    <div class="form-group">
                                    <img src="#" alt="Uploaded photo" id="uploadedPhoto4" style="display: none; margin: 0 auto; max-width: 300px; max-height: 300px;">
                                    <label for="email">SHOE INSOLE STITCH:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="file" class="form-control" name="photo" id="photoInput4" onchange="displayPhoto(event, 'uploadedPhoto4')" required>
                                    </div>
                                    <button type="submit" name="add_details" style="width:100%;" class="btn btn-default">Submit</button>
                               </form> 
                            </div>

                            <div id="ShoeBox" class="tabcontent1" style="display: none;">
                            <hr />
                                <form action="home.php?view=DETAILS&action=ShoeBox" enctype="multipart/form-data" method="POST">
                                    <div class="form-group">
                                    <img src="#" alt="Uploaded photo" id="uploadedPhoto5" style="display: none; margin: 0 auto; max-width: 300px; max-height: 300px;">
                                    <label for="email">SHOE BOX:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="file" class="form-control" name="photo" id="photoInput5" onchange="displayPhoto(event, 'uploadedPhoto5')" required>
                                    </div>
                                    <button type="submit" name="add_details" style="width:100%;" class="btn btn-default">Submit</button>
                               </form> 
                            </div>

                            <div id="ShoeDate" class="tabcontent1" style="display: none;">
                            <hr />
                               <form action="home.php?view=DETAILS&action=ShoeDate" enctype="multipart/form-data" method="POST">
                                    <div class="form-group">
                                    <img src="#" alt="Uploaded photo" id="uploadedPhoto6" style="display: none; margin: 0 auto; max-width: 300px; max-height: 300px;">
                                    <label for="email">SHOE DATE:</label>
                                    <input type="hidden" class="form-control" name="sku" value="<?php echo $_GET['sku']; ?>" required>
                                    <input type="file" class="form-control" name="photo" id="photoInput6" onchange="displayPhoto(event, 'uploadedPhoto6')" required>
                                    </div>
                                    <button type="submit" name="add_details" style="width:100%;" class="btn btn-default">Submit</button>
                               </form> 

                            </div>



                            
                            </div>
                        </div>
                    </div>
                </div>

                

