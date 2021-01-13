class Validation
{
    constructor()
    {
        this.errors = {};
    }

    getMessage(field)
    {
        if(this.errors[field])
        {
            return this.errors[field][0];
        }
    }

    hasMessage(field)
    {
        return this.errors.hasOwnProperty(field);
    }

    setMessage(errors)
    {
        this.errors = errors;
    }
}

export default Validation;