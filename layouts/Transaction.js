import { markdownify } from "@lib/utils/textConverter";

function Transaction({ data }) {
  const { frontmatter } = data;
  const { title, transactions } = frontmatter;
  return (
    <section className="section">
      <div className="container">
        {markdownify(title, "h1", "text-center font-normal")}
        <div className="section row  -mt-6">
          {transactions.map((transaction, index) => (
            <div key={index} className="col-12 mt-6 md:col-6  ">
              <div className="p-6  shadow">
                <div className="faq-head relative">
                  {markdownify(transaction.title, "h4")}
                </div>
                <div>
                  {markdownify(transaction.title, "h5", "title")}
                  {markdownify(`ID: ${transaction.id}`, "p", "faq-body mt-6 ")}
                  {markdownify(`Retailer: ${transaction.retailer}`, "p", "faq-body mt-6")}
                  {markdownify(`Price: ${transaction.amount}`, "p", "faq-body mt-6")}
                  {markdownify(`Date: ${transaction.date}`, "p", "faq-body mt-6")}
                </div>

              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

export default Transaction;
