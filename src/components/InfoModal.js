import React, {useState} from 'react'

const InfoModal = (props) => {

const [showContact, setshowContact] = useState(props.contactOpenModal);
const [showOffer, setshowOffer] = useState(props.offerOpenModal);
const handleClose = () => {
  setshowContact(false);
  setshowOffer(false);
}
    return(
      <div className={`modal fade ${showContact || showOffer ? 'show d-block': 'd-none'}`} id="myModal">
      <div className="modal-dialog modal-md modal-dialog-centered">
        <div className="modal-content">
    
          <div className="modal-header">
    <h4 className="modal-title">{showContact ? 'Message sent!' : 'Car Info received'}</h4>
             <button type="button" className="close" data-dismiss="modal" onClick={() => handleClose()}>&times;</button>
          </div>
    
  
          <div className="modal-body">
            {showContact ? <>
            <p>Thanks for contacting us.</p>
            <p> We will try to respond to your message as soon as possible. </p></>
          : 
          <><p>Your Car Details have been received by our team.</p>
          <p> We will try to send you the Quotation as soon as possible. </p>
          </>
          }

          </div>
            <div className="modal-footer">
            <button type="button" className="btn btn-danger submitButtonNormal" data-dismiss="modal" onClick={() => handleClose()}>Ok</button>
          </div>
    
        </div>
      </div>
    </div>
    )
}

export default InfoModal