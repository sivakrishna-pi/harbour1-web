<?php
include('mpdf60/mpdf.php');
ob_start();

            $body .='<html>
            <head>
               <meta charset="utf-8">
               <link rel="stylesheet" href="invicestyle.css?vas">
            </head>
            <body>
               <div class="fullwidth">
                  <div class="fullwidth">
                     <div class="left-block">
                        <b>Pi DATACENTERS PRIVATE LIMITE</b><br />
                        Survey No 49 P, Plot 12, IT Layout, Autonagar,<br />
                        Mangalagiri<br />
                        Guntur, Andhra Pradesh 522503<br />
                        IN<br />
                        4033539999<br />
                        d.mounika@pidatacenters.com<br />
                        GSTIN: 37AAHCP8334J1ZZ<br />
                        PAN No. AAHCP8334J<br />
                        CIN: U72200AP2014PTC095214<br />
                     </div>
                     <div style="text-align:right;">
                        <img src = "pi-logo.png"/>
                     </div>
                  </div>
                  <div class="fullwidth">
                     <p style="font-size: 20px;">Tax Invoice</p>
                  </div>
                  <div class = "fullwidth">
                     <div class="left-block">
                        <!--user Info -->
                        q<br />
                        b<br />
                        c<br />
                        d<br />
                        e<br />
                        GSTIN: 36AABCI0923L1ZN
                     </div>
                     <div style="text-align:right;">
                        <b>INVOICE NO.</b>&nbsp;&nbsp; 12232<br />
                        <b>DATE</b>&nbsp;&nbsp; sdsds<br />
                        <b>TERMS</b>&nbsp;&nbsp; Advance<br />
                     </div>
                  </div>
                  
                  <table  width ="100%" cellpadding="10">
                     <tr style="text-align:center;">
                        <th>SN
                        </th>
                        <th>HASN/SAC
                        </th>
                        <th>PERIOD
                        </th>
                        <th>REVENUE CLASS
                        </th>
                        <th>QTY
                        </th>
                        <th>RATE (INR)
                        </th>
                        <th>TAX
                        </th>
                        <th>AMOUNT
                        </th>
                     </tr>
                     <tbody >
                        <tr style="text-align:center;">
                           <td>1
                           </td>
                           <td>998315</td>
                           <td>sdss
                           </td>
                           <td>dfsdfd</td>
                           <td>s1
                           </td>
                           <td>232
                           </td>
                           <td>18.0% GST
                           </td>
                           <td>sds
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <br/><br/>
                  <hr style="border-top: dashed #C0C0C0    1px;" />
                  <br/><br/>
                  <div class = "fullwidth">
                     <div class="left-block">
                     </div>
                     <div style="text-align:right;">
                        <b>SUBTOTAL</b>&nbsp;&nbsp; 2<br />
                        <b>CGST @ 9% on 1.00</b>&nbsp;&nbsp; 23<br />
                        <b>SGST @ 9% on 1.00</b>&nbsp;&nbsp; ds<br />
                        <b>TOTAL</b>&nbsp;&nbsp; sfd<br />
                     </div>
                  </div>
               </div>
            </body>
         </html>';


         $mpdf=new mPDF('','A4', 0, '', 15, 15, 45, 35, 5, 10, '');
         $mpdf->SetDisplayMode('fullpage');
          
         $mpdf->pagenumPrefix = 'Page No : ';
         
         $mpdf->WriteHTML($stylesheet,1);
         $mpdf->WriteHTML($body,0);
         $mpdf->AddPage();
         
         $mpdf->WriteHTML($tandc,2);
         $filename='invoice-'.$order_id;
         ob_end_flush();
         $mpdf->Output("$filename.pdf", "D");
         //out put in browser below output function
        $mpdf->Output();
?>