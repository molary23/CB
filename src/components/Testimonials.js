import React, {useEffect, useState} from 'react'
import axios from 'axios'
import { Container, Row, Col, Card } from 'react-bootstrap';

function Testimonials(props) {
 const [posts, setPosts] = useState([])
 const [errorMsg, setError] = useState('')
 useEffect(() => {
     axios.get('http://jsonplaceholder.typicode.com/posts/1/comments')
     .then(response => {setPosts(response.data.splice(2, 3))})
     .catch(error => {setError('Something went wrong... Kindly refresh the page.')})
 }, [])

    return (
        <div className="testimonials" ref={props.testimonialRef}>
            <h1>Testimonials</h1>
            <h4>What our clients have to say</h4>
            <div className="testify">
            <Container fluid>
<Row>
 {
     posts.map((post) => (
        <Col md={4} xs={12} sm={6} key={post.id} className="testDIV">
<Card className="testimony">
<Card.Body>
<blockquote></blockquote>
    <p>{post.body}</p>
<span>- <em>{post.email}</em></span>
</Card.Body>
</Card>
</Col>
     ))
 }   
</Row>
{errorMsg ? <div className="loadingError">{errorMsg}</div>: null}
</Container>
</div>
        </div>
    )
}

export default Testimonials
