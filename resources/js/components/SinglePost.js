import React from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';



export default class SinglePost extends React.Component{


    constructor(props){
        super(props); 
    }


    //variable pour la recuperation des articles et le loading associé
    state={
        article :[],
        loading:true,
    }
    

    async componentDidMount(){
        //Appel en post pour récuperer les informations du flux
        //Utilisation Axios
        const res = await Axios.post('/flux/'+this.props.data);
        
        if(res.data.status===200){
           
            this.setState({
                article: JSON.parse(res.data.data),
                loading:false,
           
            })
        }


    }

    render() {

        var content_HTML="HELLO";

        var dataArticle =[];
        
        if(this.state.loading){
            content_HTML="Loading...";
        }else{
            //affichage des articles récupérés
            dataArticle=this.state.article;
            content_HTML= <div className="col-12 ">
                        <div className="card">
                            <img className="card-img-top" src={dataArticle.media} />
                            <div className="card-body">
                                <h5 className="card-title">{dataArticle.title}</h5>
                                <p className="card-text">{dataArticle.description}</p>
                                
                            </div>
                        </div>
                
                </div>
                ;
            
        }
        return  <div className="container"><div className="row">{ content_HTML }</div></div>
    }
}



if (document.getElementById('singlepost')) {
    var data = document.getElementById('singlepost').getAttribute('data');
    ReactDOM.render(<SinglePost data={data} />, document.getElementById('singlepost'));
}
