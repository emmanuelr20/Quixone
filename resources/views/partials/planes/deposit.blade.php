<div class="tab-pane" id="deposit">
    <h4>Pay using credit card (PayStack)</h4>
    <form class="form-horizontal" action="{{ route('pay') }}/paystack" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="pamount" class="col-sm-6 control-label">Amount</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="pamount" name="amount" placeholder="Amount in Naira" required autofocus>
            </div>
        </div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Proceed</button>
        </div>
    </form>
    <br>
    <hr>
    <h4>Pay using recharge card (CheetahPay)</h4>
    <form class="form-horizontal" action="{{ route('pay') }}/cheetahpay" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="camout" class="col-sm-6 control-label">Amount</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="amount" id="camout" placeholder="Amount in Naira" required>
            </div>
            <label for="cpin" class="col-sm-6 control-label">Pin</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="pin" id="cpin" placeholder="eg. 1111222233334444" required>
            </div>
            <label for="cnetwork" class="col-sm-6 control-label">Network Provider</label>
            <div class="col-sm-10">
                <select name="network" class="form-control" id="cnetwork">
                    <option value="MTN">MTN</option>
                    <option value="AIRTEL">AIRTEL</option>
                    <option value="9 MOBILE">9 MOBILE</option>
                    <option value="GLO">GLO</option>
                </select>
            </div>
        </div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Proceed</button>
        </div>
    </form>
</div>