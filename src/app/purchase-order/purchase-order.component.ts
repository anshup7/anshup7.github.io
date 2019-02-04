import { Component, OnInit, Input } from '@angular/core';
import { AsyncHttpService } from "src/app/provider/async-http.service";
import { ActivatedRoute } from "@angular/router";
import { NotificationService } from "src/app/provider/notification";

@Component({
  selector: 'app-purchase-order',
  templateUrl: './purchase-order.component.html',
  styleUrls: ['./purchase-order.component.css']
})
export class PurchaseOrderComponent implements OnInit {

  title = 'Create PO';
  lineNosNotAllowed = [];
  @Input() poID: any;
  @Input() projectID: any;
  pos = [];
  po: any = {
    qty: '',
    lineNumber: '',
    poNumber: '',
    lineDesc: '',
    rate: '',
    totalAmount: 0,
    poAmt: ''
  };


  constructor(private service: AsyncHttpService, private activatedRoute: ActivatedRoute, private notification: NotificationService) { }


  ngOnInit() {
    if (this.poID) {
      this.service.get('http://192.168.216.48:8080/protracker/app/api/po/' + this.projectID + '/' + this.poID).subscribe(data => {
        this.title = "Edit PO"
        this.po.poNumber = data.content[0].pONumber;
        this.po.totalAmount = data.content[0].pOAmount;
        this.pos = data.content[0].poLineItems;


      });
    } else {
      const referer = {
        qty: '',
        lineNumber: '',
        poNumber: '',
        lineDesc: '',
        rate: '',
        poAmt: '',

        metaIndex: 1,
        isEditable: true
      };
      this.pos.push(referer);
    }
  }

  addRow() {
    console.log(this.pos);
    if (this.pos.length > 0) {
      if (this.pos[this.pos.length - 1].qty != '' && this.pos[this.pos.length - 1].lineNumber != '') {
        const referer = {
          qty: '',
          lineNumber: '',
          poNumber: '',
          lineDesc: '',
          rate: '',

          poAmt: '',
          metaIndex: '',
          isEditable: true
        };
        this.pos[this.pos.length - 1].isEditable = false;
        this.pos.push(referer)
        this.pos[this.pos.length - 1].metaIndex = this.pos.length;
      }
    } else {
      const referer = {
        qty: '',
        lineNumber: '',
        poNumber: '',
        lineDesc: '',
        rate: '',
        poAmt: '',
        metaIndex: 1,
        isEditable: true
      };
      this.pos.push(referer);
    }
  }

  save() {
    // const sendingObject = {
    //   poNumber: this.po.number,
    //   poArray: this.pos
    // }

    console.log("popopopopo", this.po.poNumber)
    const createUrl = 'http://192.168.216.48:8080/protracker/app/api/po/create';
    const updateUrl = 'http://192.168.216.48:8080/protracker/app/api/po/update/'+this.poID;
    const calledUrl = this.title == 'Create PO' ? createUrl : updateUrl;
    const sendingObject = {
      pONumber: this.po.poNumber,
      pOAmount: this.po.totalAmount,
      project: {
        projectId: this.projectID
      },
      startDate: '2019-02-01',
      poLineItems: this.pos

    }
    this.service.post(calledUrl,
      sendingObject).subscribe(data => {
        this.notification.updateNotification({
          show: true,
          status: data.responseCode,
          message: data.responseCode == 200 ? 'Success' : 'Faliure'
        })
      })
    console.log(sendingObject);
  }



  editPO(referenceObj: any) {
    referenceObj.isEditable = !referenceObj.isEditable;
  }

  setValue(ref) {

    this.pos.forEach(objects => {
      if (objects.lineNumber == ref.lineNumber && objects.metaIndex != ref.metaIndex) {
        alert("Line Numbers can't be equal!");
        ref.lineNumber = null;
      }
    });

    ref.poAmt = ref.rate * ref.qty;
    if (ref.poAmt) {
      this.po.totalAmount = 0;
      this.pos.forEach(po => {

        this.po.totalAmount += po.poAmt;
      });
    }
  }


  deletePo(type, metaIndex?: any, ) {
    if (confirm("Do You want to proceed with deletion?")) {
      this.pos.forEach((val, index) => {
        if (val.metaIndex == metaIndex) {
          this.pos.splice(index, 1);
          this.po.totalAmount -= val.poAmt;
          console.log(this.pos);
        }
      });

    }
  }

}
