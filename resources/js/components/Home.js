import React from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';

export default class Home extends React.Component{


    constructor(props){
        super(props);
    }

    //variable pour la recuperation des articles et le loading associé
    state={
        articles :[],
        loading:true,
    }


    async componentDidMount(){
        //Appel en post pour récuperer les informations du flux
        //Utilisation Axios
        const res = await Axios.post('/flux');
        
        if(res.data.status===200){
           
            this.setState({
                articles: JSON.parse(res.data.data),
                loading:false,
            })
        }


    }


    render() {

        var content_HTML="";
        var dataArticles =[];
        
        if(this.state.loading){
            content_HTML="Loading...";
        }else{
            //affichage des articles récupérés
            dataArticles=this.state.articles;
            content_HTML=
            dataArticles.map((article, index) => {
                return(
                    <div key={article.title} className="col-12 col-md-4 mb-5">
                        <div className="card">
                            <img className="card-img-top" src={article.media} />
                            <div className="card-body">
                                <h5 className="card-title">{article.title}</h5>
                                <p className="card-text">{article.description}</p>
                                <p className="card-text">Publié le <br /><small>{article.date}</small></p>
                                <a href={"/news/"+index} className="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                );
            })
        }
        return  <div className="container"><div className="row">{ content_HTML }</div></div>
    }
}



if (document.getElementById('home')) {
    ReactDOM.render(<Home />, document.getElementById('home'));
}
