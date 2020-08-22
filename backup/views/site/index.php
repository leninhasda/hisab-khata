<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
  <div class="row">
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-success text-center">
                            <i class="ti-wallet"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Debit</p>
                            $1,345
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-calendar"></i> In lifetime
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-danger text-center">
                            <i class="ti-pulse"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Expense</p>
                            $573
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-timer"></i> In lifetime
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="col-lg-4 col-sm-6">
          <div class="card">
              <div class="content">
                  <div class="row">
                      <div class="col-xs-5">
                          <div class="icon-big icon-warning text-center">
                              <i class="ti-server"></i>
                          </div>
                      </div>
                      <div class="col-xs-7">
                          <div class="numbers">
                              <p>Capacity</p>
                              105GB
                          </div>
                      </div>
                  </div>
                  <div class="footer">
                      <hr />
                      <div class="stats">
                          <i class="ti-reload"></i> Updated now
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-6">
          <div class="card">
              <div class="header">
                  <h4 class="title">Expense in percentage</h4>
                  <p class="category">Last month</p>
              </div>
              <div class="content">
                  <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                  <div class="footer">
                      <div class="chart-legend">
                          <i class="fa fa-circle text-info"></i> Open
                          <i class="fa fa-circle text-danger"></i> Bounce
                          <i class="fa fa-circle text-warning"></i> Unsubscribe
                      </div>
                      <hr>
                      <div class="stats">
                          <i class="ti-timer"></i> Campaign sent 2 days ago
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="card ">
              <div class="header">
                  <h4 class="title">April 2018</h4>
                  <p class="category">Whole month drill</p>
              </div>
              <div class="content">
                  <div id="chartActivity" class="ct-chart"></div>

                  <div class="footer">
                      <div class="chart-legend">
                          <i class="fa fa-circle text-info"></i> Tesla Model S
                          <i class="fa fa-circle text-warning"></i> BMW 5 Series
                      </div>
                      <hr>
                      <div class="stats">
                          <i class="ti-check"></i> Data information certified
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
