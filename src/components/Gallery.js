import React, { Component } from 'react'
import axios from 'axios'
import { Container, Row, Col, Image } from 'react-bootstrap'

 class Gallery extends Component {
     constructor(props) {
         super(props)
     
         this.state = {
              photos: [],
              errorMsg: '',
              there: false,
              count: 0
         }
     }
     
    componentDidMount(){
        axios.get('http://jsonplaceholder.typicode.com/albums/1/photos')
        .then(response =>{
            this.setState({
                photos: response.data.splice(8, 8)
            })
        })
        .catch(error => {
            this.setState({
                errorMsg: 'Something went wrong... Kindly refresh the page.'
            })
        })
        this.handleScroll = () => {
            if(this.state.count < 1){
            let top = this.props.galleryRef.current.offsetTop,
            winScroll = window.scrollY,
            height = this.props.galleryRef.current.offsetHeight,
            bottom = top + height
            console.log(`Top 1: ${top} and Bottom 1: ${bottom} WinScroll 1: ${winScroll}`)
            if((winScroll >= (top - 100)) && (winScroll <= bottom)){
                console.log(`Top ${top} and Bottom: ${bottom} WinScroll: ${winScroll}`)
                this.setState({
                    there: true,
                    count: this.state.count + 1
                })
            }
          }  
        }   
        window.addEventListener('scroll', this.handleScroll, { passive: true })
    }

    componentWillUnmount(){
        window.removeEventListener('scroll', this.handleScroll)
     }


    render() {
        const {photos, errorMsg, there} = this.state
        return (
            <div className="gallery" ref={this.props.galleryRef}>
                <h1>Previous Projects</h1>
                <div className="galleryPhotos"></div>
                <Container fluid>
                    <Row>
                       {there ?  photos.map((photo) => (
                           <Col sm={3} key={photo.id}>
                           <div className="imageContainer">
                           <Image src={photo.url} alt={photo.title} className="galleryImage" fluid loading='lazy'/>
                               <div className="overlay">
                                   <div className="imageDescription">
                                   <p>{photo.title}</p>
                                   </div>
                               </div>   
                               </div> 
                           </Col>
                       )) : '' }
                    </Row>
                 {errorMsg ? <div className="loadingError">{errorMsg}</div>: null}
                </Container>
                
            </div>
        )
    }
}

export default Gallery
