@extends('layouts.app')

@section('title')
Appraisal Form
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header pt-1 pb-1">
            <h3 class="card-title text-custom">
                Staff Appraisal Form
                <a target="_blank" href="{{ route('print') }}" class="btn btn-sm btn-primary float-right"><span class="fa fa-print"></span> Print Form</a>
            </h3>
          </div>
          <div class="card-body">
              <h2>STAFF PERFORMANCE REPORT APPRAISAL FORM</h2>
              <strong>Performance Assessment Report for the Period ended: {{date('d M, Y') }}</strong>
              <br><br>
              <h4>Introduction</h4>
              <p>
                  Staff Performance Assessment is part of the Performance Management System of AfyaCare.
                  It is used as a management tool for establishing the extent to which set targets within overall mandates of the organization are achieved.
                  through staff performance evaluation, performance gaps and development needs of an individual employee are identified.
                  The evaluation process offers an opportunity to the staff and Supervisors to dialogue and as well as obtain a feedback on performance. It is
                  our call to encourage participatory approach to the evaluation process and consistence in filling this form.
              </p>
              <strong>Period of Assessment: 01 January 2020 to 31 Decemeber 2021</strong>
              <br><br><br>
              <h4>Section A</h4>
              <strong>1.0 Staff Particulars</strong>
                    <table class="table table-responsive-sm">
                      <tbody>
                          <tr>
                              <td width="30%">Name of Appraisee :</td>
                              <td>{{ Auth::user()->name }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Date of Birth :</td>
                            <td>{{ date('d M, Y', strtotime(Auth::user()->dob)) }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Department :</td>
                            <td>{{ Auth::user()->department }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Faculty :</td>
                            <td>{{ Auth::user()->faculty }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Job Title :</td>
                            <td>{{ Auth::user()->job_title }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Salary Scale :</td>
                            <td>{{ Auth::user()->salary_scale }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Date of Appointment :</td>
                            <td>{{ Auth::user()->appointment_date }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Terms of Service :</td>
                            <td><span class="badge badge-info">{{ Auth::user()->terms_of_service }}</span></td>
                          </tr>
                          <tr>
                            <td width="30%">Email Address :</td>
                            <td>{{ Auth::user()->email }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Phone :</td>
                            <td>{{ Auth::user()->phone }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Name of Appraiser/Supervisor :</td>
                            <td>{{ Auth::user()->appraiser->name }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Supervisor Job Title/Rank :</td>
                            <td>{{ Auth::user()->appraiser->job_title }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Supervisor Salary Scale :</td>
                            <td>{{ Auth::user()->appraiser->salary_scale }}</td>
                          </tr>
                      </tbody>
                    </table>

              <br>
              <h4>SECTION B: APPRAISAL ASSESSMENT</h4>
              <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('personal-appraisal')}}" method="POST">
                @csrf
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="text-align: center;" colspan="1">ASSESSMENT FORM</th>
                            <th colspan="12" style="text-align: center;">SCOREBOARD</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Performance Factors</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <input type="hidden" value="{{ Auth::user()->staff_id }}" name="staff_id">
                            <td>1</td>
                            <td>Accountability <br> (Demonstrates a high level of ownership/commitment to achieve results)</td>
                                <td><input type="radio" id="1" name="accountability" value="1" required></td>
                                <td><input type="radio" id="2" name="accountability" value="2"></td>
                                <td><input type="radio" id="3" name="accountability" value="3"></td>
                                <td><input type="radio" id="4" name="accountability" value="4"></td>
                                <td><input type="radio" id="5" name="accountability" value="5"></td>
                                <td><input type="radio" id="6" name="accountability" value="6"></td>
                                <td><input type="radio" id="7" name="accountability" value="7"></td>
                                <td><input type="radio" id="8" name="accountability" value="8"></td>
                                <td><input type="radio" id="9" name="accountability" value="9"></td>
                                <td><input type="radio" id="10" name="accountability" value="10"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Integrity & Trustworthy <br>
                                (Achieves a high level of trust in relationships Adheres to the organization values and guidelines of conduct Actions are consistent with words Communicates high personal standards)
                                </td>
                                <td><input type="radio" id="1" name="integrity" value="1" required></td>
                                <td><input type="radio" id="2" name="integrity" value="2"></td>
                                <td><input type="radio" id="3" name="integrity" value="3"></td>
                                <td><input type="radio" id="4" name="integrity" value="4"></td>
                                <td><input type="radio" id="5" name="integrity" value="5"></td>
                                <td><input type="radio" id="6" name="integrity" value="6"></td>
                                <td><input type="radio" id="7" name="integrity" value="7"></td>
                                <td><input type="radio" id="8" name="integrity" value="8"></td>
                                <td><input type="radio" id="9" name="integrity" value="9"></td>
                                <td><input type="radio" id="10" name="integrity" value="10"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Decision Making/Judgment <br>
                                (Assess the importance, urgency and risk associated with each situation and takes actions which ara timely and in the best interests of the company)
                                </td>
                                <td><input type="radio" id="1" name="judgement" value="1" required></td>
                                <td><input type="radio" id="2" name="judgement" value="2"></td>
                                <td><input type="radio" id="3" name="judgement" value="3"></td>
                                <td><input type="radio" id="4" name="judgement" value="4"></td>
                                <td><input type="radio" id="5" name="judgement" value="5"></td>
                                <td><input type="radio" id="6" name="judgement" value="6"></td>
                                <td><input type="radio" id="7" name="judgement" value="7"></td>
                                <td><input type="radio" id="8" name="judgement" value="8"></td>
                                <td><input type="radio" id="9" name="judgement" value="9"></td>
                                <td><input type="radio" id="10" name="judgement" value="10"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Communication skills <br>(Effectively presents and receives information both orally and in writing)</td>
                                <td><input type="radio" id="1" name="communication" value="1" required></td>
                                <td><input type="radio" id="2" name="communication" value="2"></td>
                                <td><input type="radio" id="3" name="communication" value="3"></td>
                                <td><input type="radio" id="4" name="communication" value="4"></td>
                                <td><input type="radio" id="5" name="communication" value="5"></td>
                                <td><input type="radio" id="6" name="communication" value="6"></td>
                                <td><input type="radio" id="7" name="communication" value="7"></td>
                                <td><input type="radio" id="8" name="communication" value="8"></td>
                                <td><input type="radio" id="9" name="communication" value="9"></td>
                                <td><input type="radio" id="10" name="communication" value="10"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Quality of work <br>
                                (Sets and adheres to priorities. Meats established standards, deadlines and work schedules uses resources efficiently and economically)
                                </td>
                                <td><input type="radio" id="1" name="quality" value="1" required></td>
                                <td><input type="radio" id="2" name="quality" value="2"></td>
                                <td><input type="radio" id="3" name="quality" value="3"></td>
                                <td><input type="radio" id="4" name="quality" value="4"></td>
                                <td><input type="radio" id="5" name="quality" value="5"></td>
                                <td><input type="radio" id="6" name="quality" value="6"></td>
                                <td><input type="radio" id="7" name="quality" value="7"></td>
                                <td><input type="radio" id="8" name="quality" value="8"></td>
                                <td><input type="radio" id="9" name="quality" value="9"></td>
                                <td><input type="radio" id="10" name="quality" value="10"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Quantity of work <br>
                                (Completes assignments by or before deadline. Produces acceptable quantity of work Works at a steady pace regardless of environmental pressures)
                                </td>
                                <td><input type="radio" id="1" name="quantity" value="1" required></td>
                                <td><input type="radio" id="2" name="quantity" value="2"></td>
                                <td><input type="radio" id="3" name="quantity" value="3"></td>
                                <td><input type="radio" id="4" name="quantity" value="4"></td>
                                <td><input type="radio" id="5" name="quantity" value="5"></td>
                                <td><input type="radio" id="6" name="quantity" value="6"></td>
                                <td><input type="radio" id="7" name="quantity" value="7"></td>
                                <td><input type="radio" id="8" name="quantity" value="8"></td>
                                <td><input type="radio" id="9" name="quantity" value="9"></td>
                                <td><input type="radio" id="10" name="quantity" value="10"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Leadership/Coach1ng skills <br>
                                (Demonstrates ability to direct team in accomplishing work Creates a culture supportive of staff, fosters individual motivation, high levels of individual and team performance
                                </td>
                                <td><input type="radio" id="1" name="leadership" value="1" required></td>
                                <td><input type="radio" id="2" name="leadership" value="2"></td>
                                <td><input type="radio" id="3" name="leadership" value="3"></td>
                                <td><input type="radio" id="4" name="leadership" value="4"></td>
                                <td><input type="radio" id="5" name="leadership" value="5"></td>
                                <td><input type="radio" id="6" name="leadership" value="6"></td>
                                <td><input type="radio" id="7" name="leadership" value="7"></td>
                                <td><input type="radio" id="8" name="leadership" value="8"></td>
                                <td><input type="radio" id="9" name="leadership" value="9"></td>
                                <td><input type="radio" id="10" name="leadership" value="10"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Safety <br>
                                (Aware of the company safety and security policles and regulations Reports potential safety hazards)
                                </td>
                                <td><input type="radio" id="1" name="safety" value="1" required></td>
                                <td><input type="radio" id="2" name="safety" value="2"></td>
                                <td><input type="radio" id="3" name="safety" value="3"></td>
                                <td><input type="radio" id="4" name="safety" value="4"></td>
                                <td><input type="radio" id="5" name="safety" value="5"></td>
                                <td><input type="radio" id="6" name="safety" value="6"></td>
                                <td><input type="radio" id="7" name="safety" value="7"></td>
                                <td><input type="radio" id="8" name="safety" value="8"></td>
                                <td><input type="radio" id="9" name="safety" value="9"></td>
                                <td><input type="radio" id="10" name="safety" value="10"></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Commitment <br>
                                (Demonstrates trust to carryout work and rely on the person to do an accurate job)
                                </td>
                                <td><input type="radio" id="1" name="commitment" value="1" required></td>
                                <td><input type="radio" id="2" name="commitment" value="2"></td>
                                <td><input type="radio" id="3" name="commitment" value="3"></td>
                                <td><input type="radio" id="4" name="commitment" value="4"></td>
                                <td><input type="radio" id="5" name="commitment" value="5"></td>
                                <td><input type="radio" id="6" name="commitment" value="6"></td>
                                <td><input type="radio" id="7" name="commitment" value="7"></td>
                                <td><input type="radio" id="8" name="commitment" value="8"></td>
                                <td><input type="radio" id="9" name="commitment" value="9"></td>
                                <td><input type="radio" id="10" name="commitment" value="10"></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Organization and Planning skills <br>
                                (Uses an effective methodology to determine priorities, set goals, create a plan, take action and measure results)
                                </td>
                                <td><input type="radio" id="1" name="planning" value="1" required></td>
                                <td><input type="radio" id="2" name="planning" value="2"></td>
                                <td><input type="radio" id="3" name="planning" value="3"></td>
                                <td><input type="radio" id="4" name="planning" value="4"></td>
                                <td><input type="radio" id="5" name="planning" value="5"></td>
                                <td><input type="radio" id="6" name="planning" value="6"></td>
                                <td><input type="radio" id="7" name="planning" value="7"></td>
                                <td><input type="radio" id="8" name="planning" value="8"></td>
                                <td><input type="radio" id="9" name="planning" value="9"></td>
                                <td><input type="radio" id="10" name="planning" value="10"></td>
                        </tr>
                    </tbody>
                    <br>
                    <tfoot>
                        <tr>
                                <td colspan="12" style="text-align: right">
                                    <button class="btn btn-secondary" type="reset">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </td>
                        </tr>
                    </tfoot>
                </table>
              </form>

          </div>
        </div>
      </div>
    </div>
</div>
@endsection
